#!/bin/bash

#variables
export_directory="website"
if [ $# -gt 0 ]; then
	export_directory=$1
fi
template=$(cat template/example.php)

#copy source data
cp -r data/examples $export_directory

#generate php files for every example file
for category in $export_directory/examples/*; do
	for example in $category/*; do
		name=${example##*/}
		content=${template/\$Name/$name}
		content=${content/\$Codefile/$name/$name.pde}
		echo -en "$content" >> $example.php
	done
done