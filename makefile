#globals
default: build
freshen: clean build
clean: clean-specials
	rm -rf bin/*
freshen: clean build

#variables
cp = -cp src:bin:lib/*
dest = -d bin
export_dir = website
version = -source 1.7 -target 1.7
#warnings = -Xlint:-options
warnings = -Xlint:-deprecation -Xlint:-options

#include files
include dependencies.mk

#build definitions
$(class_files): bin/%.class : src/%.java
	javac $(cp) $(dest) $(version) $(warnings) $<

data:
	git clone git@github.com:vialab/SMT.git \
		-b master data

#basic commands
build: $(class_files)

#extra commands
clean-specials:
	rm -rf $(export_dir)

generate: build generate.sh
	./generate.sh $(export_dir)

git-prepare:
	git add -A
	git add -u

update-data: data
	cd data && git pull origin master
update-localhost:
	sudo rm -rf /var/www/html/smt/*
	sudo cp -r html/* /var/www/html/smt/
update-kiwiheart:
	scp -r * kiwiheart.ca:~/smt-web