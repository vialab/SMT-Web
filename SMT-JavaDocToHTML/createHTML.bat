
rmdir ..\SMT-Website\reference /s /q
mkdir ..\SMT-Website\reference
del ..\SMT-Website\reference.html

javadoc -doclet SMT_Doclet -docletpath bin\ -public ..\..\SMT\src\vialab\SMT\*.java