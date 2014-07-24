#!/bin/bash

#variables
export_directory="website"
if [ $# -gt 0 ]; then
	export_directory=$1
fi
template=$(cat template/example.php)

#copy source smt-repo
rm -rf $export_directory/examples/*
mkdir -p $export_directory/examples
cp -r smt-repo/examples/* $export_directory/examples

#generate php files for every example file
for category in $export_directory/examples/*; do
	for example in $category/*; do
		name=${example##*/}
		rel_codefile=${example#*/}/$name.pde
		codefile=/smt/$rel_codefile
		#name
		content=${template/\$Name/$name}
		#dl link
		content=${content/\$Rel_codefile/$rel_codefile}
		#direct dl link
		content=${content/\$Codefile/$codefile}
		#code tag
		content=${content/\$Codefile/$codefile}
		echo -en "$content" >> $example.php
	done
done