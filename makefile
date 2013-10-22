#globals
default: build
freshen: clean build
clean: clean-specials
	rm -rf bin/*
freshen: clean build

#variables
cp = -cp src:bin:lib/*
dest = -d bin
docscp = -classpath data/src:data/bin:data/lib/*:data/lib/processing/*
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

data:
	git clone git@github.com:vialab/SMT.git \
		-b master data

#basic commands
build: $(class_files)

update: build $(export_directory) \
		update-data \
		update-examples \
		update-reference
	cp -a html/* $(export_directory)
	cp -r data/javadoc $(export_directory)
	cp data/library.properties $(export_directory)/dl/SMT.txt
#	cp data/SMT.zip $(export_directory)/dl/

#extra commands
clean-specials:
	rm -rf $(export_directory)

git-prepare:
	git add -A
	git add -u

#update macros
update-data: data $(export_directory)
	cd data && \
		git pull origin master && \
		make docs
update-examples: $(export_directory)
	rm -rf $(export_directory)/examples
	script/examples.sh $(export_directory)
update-reference: $(export_directory) build
	rm -rf $(export_directory)/reference
	javadoc -doclet vialab.SMT.website.SMTDoclet -docletpath bin -public \
		$(docscp) \
		data/src/vialab/SMT/*.java \
		data/src/vialab/SMT/event/*.java \
		data/src/vialab/SMT/test/*.java \
		data/src/vialab/SMT/zone/*.java

#push macros
push-localhost:
	sudo rm -rf /var/www/html/smt/*
	sudo cp -a website/* /var/www/html/smt/
push-kiwiheart:
	scp -a website/* kiwiheart.ca:~/smt-web