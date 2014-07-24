#globals
default: update
freshen: clean build
clean:
	rm -rf bin/* $(export_dir)/*
freshen: clean build update

#variables
cp = -cp src:bin:lib/*
dest = -d bin
docscp = -classpath smt-repo/src:smt-repo/bin:smt-repo/lib/*:smt-repo/lib/processing/*
export_dir = website
version = 
#warnings = -Xlint:-options
warnings = 

#include files
include dependencies.mk

#build definitions
$(class_files): bin/%.class : src/%.java
	javac $(cp) $(dest) $(version) $(warnings) $<

#basic commands
build: $(class_files)

update: build $(export_dir) \
		$(export_dir)/examples \
		$(export_dir)/dl/SMT.txt \
		$(export_dir)/dl/SMT.zip \
		$(export_dir)/reference \
		$(export_dir)/javadoc
	cp -a html/* $(export_dir)

test: update
	rm -rf ~/www/smt/*
	mkdir -p ~/www/smt/
	cp -r website/* ~/www/smt/

#update stuff
$(export_dir):
	mkdir -p $@
$(export_dir)/dl:
	mkdir -p $@
$(export_dir)/examples:
	rm -rf $(export_dir)/examples
	mkdir -p $(export_dir)/examples
	script/examples.sh $(export_dir)
$(export_dir)/dl/SMT.txt:
	mkdir -p $(export_dir)/dl
	cp smt-repo/library.properties $(export_dir)/dl/SMT.txt
$(export_dir)/dl/SMT.zip:
	mkdir -p $(export_dir)/dl
	cp smt-repo/SMT*.zip $(export_dir)/dl/SMT.zip
$(export_dir)/reference: $(class_files)
	rm -rf $(export_dir)/reference
	javadoc -doclet vialab.SMT.website.SMTDoclet -docletpath bin -public \
		$(docscp) $$(find smt-repo/src -name *.java)
$(export_dir)/javadoc: smt-repo/javadoc
	mkdir -p $(export_dir)
	cp -r smt-repo/javadoc $(export_dir)

#push macros
deploy-local:
	sudo mkdir -p /var/www/html/smt/
	sudo rm -rf /var/www/html/smt/*
	sudo cp -r website/* /var/www/html/smt/
deploy-home:
	ssh home-root "rm -rf /var/www/html/smt/"
	scp -r website home-root:/var/www/html/smt
deploy-vialab:
	lftp \
		-u $$(cat data/ftp_credentials.txt) \
		sftp://vialab.science.uoit.ca:22 \
		-e "mirror -R website /vialab/smt -P 30; exit"
