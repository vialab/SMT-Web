#globals
default: build
freshen: clean build
clean: clean-specials
	rm -rf bin/*
freshen: clean build

#variables
cp = -cp src:bin:lib/*
dest = -d bin
docscp = -classpath smt-repo/src:smt-repo/bin:smt-repo/lib/*:smt-repo/lib/processing/*
export_directory = website
version = 
#warnings = -Xlint:-options
warnings = 

#include files
include dependencies.mk

#build definitions
$(class_files): bin/%.class : src/%.java
	javac $(cp) $(dest) $(version) $(warnings) $<

$(export_directory):
	mkdir -p $@

smt-repo:
	git clone git@github.com:vialab/SMT.git \
		-b master smt-repo

#basic commands
build: $(class_files)

update: build $(export_directory) \
		update-examples \
		update-reference \
		update-others

deploy: deploy-local

#extra commands
clean-specials:
	rm -rf $(export_directory)/*

git-prepare:
	git add -A
	git add -u

#update macros
update-examples: $(export_directory)
	rm -rf $(export_directory)/examples
	script/examples.sh $(export_directory)
update-reference: $(export_directory) build
	rm -rf $(export_directory)/reference
	javadoc -doclet vialab.SMT.website.SMTDoclet -docletpath bin -public \
		$(docscp) $$(find smt-repo/src -name *.java)
update-others:
	cp -a html/* $(export_directory)
	cp -r smt-repo/javadoc $(export_directory)
	cp smt-repo/library.properties $(export_directory)/dl/SMT.txt
	cp smt-repo/SMT.zip $(export_directory)/dl/

#push macros
deploy-local: update
	sudo mkdir -p /var/www/html/smt/
	sudo rm -rf /var/www/html/smt/*
	sudo cp -r website/* /var/www/html/smt/
deploy-home:
	ssh root@home "rm -rf /var/www/html/smt/"
	scp -r website root@kalev.io:/var/www/html/smt
deploy-vialab: update
	lftp \
		-u $$(cat data/ftp_credentials.txt) \
		sftp://vialab.science.uoit.ca:22 \
		-e "mirror -R website /vialab/smt -P 30; exit"
