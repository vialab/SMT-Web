#!/bin/bash

#variables
export_directory="website"
if [ $# -gt 0 ]; then
	export_directory=$1
fi
template=$(cat template/example.php)

#copy source smt-repo
cp -r smt-repo/examples $export_directory

#generate php files for every example file
for category in $export_directory/examples/*; do
	for example in $category/*; do
		name=${example##*/}
		codefile=/smt/${example#*/}/$name.pde
		content=${template/\$Name/$name}
		#once for dl link
		content=${content/\$Codefile/$codefile}
		#once for code tag
		content=${content/\$Codefile/$codefile}
		echo -en "$content" >> $example.php
	done
done