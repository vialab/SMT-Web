#globals
default: build
freshen: clean build
clean: clean-specials
	rm -rf bin/*
freshen: clean build

#variables
cp = -cp src:bin:lib/*
dest = -d bin
docscp = -classpath data/src:data/bin:data/lib/*
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

update: build \
		update-data \
		update-examples \
		update-reference
	cp -r html/* $(export_directory)

#extra commands
clean-specials:
	rm -rf $(export_directory)

git-prepare:
	git add -A
	git add -u

#update macros
update-data: data
	cd data && git pull origin master
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
	sudo cp -r website/* /var/www/html/smt/
push-kiwiheart:
	scp -r website/* kiwiheart.ca:~/smt-web