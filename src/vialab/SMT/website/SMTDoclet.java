package vialab.SMT.website;

//standard library imports
import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.PrintWriter;
import java.nio.ByteBuffer;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.Collections;
import java.util.HashMap;
import java.util.Map;
import java.util.Vector;

//javadoc library imports
import com.sun.javadoc.*;

public class SMTDoclet {
	public static boolean start( RootDoc root) 
		throws FileNotFoundException {

		//documentation parameters
		Vector<String> excluded_classes = new Vector<String>();
		excluded_classes.add( "PGraphicsDelegate");
		excluded_classes.add( "MouseToTUIO");

		//ensure output directory exists
		File export_directory = new File( "website/reference");
		if( ! export_directory.exists())
			export_directory.mkdir();
		Path export_path = export_directory.toPath();

		//load templates
		String class_template;
		String constructor_template;
		String function_template;
		try {
			class_template = readFile( "template/class.php");
			constructor_template = readFile( "template/constructor.php");
			function_template = readFile( "template/function.php");
		}
		catch( IOException exception){
			exception.printStackTrace();
			return false;
		}

		//iterate through all classes
		for( ClassDoc classdoc : root.classes()){
			String class_name = classdoc.name();
			if( excluded_classes.contains( class_name)) continue;

			//ensure class output directory exists
			Path classdoc_path = export_path.resolve( class_name);
			File classdoc_directory = classdoc_path.toFile();
			if( ! classdoc_directory.exists())
				classdoc_directory.mkdir();

			//output
			System.out.printf( "Documenting %s\n", class_name);

			//create and open include file
			File include_file = classdoc_path.resolve( "include.php").toFile();
			PrintWriter include_writer = new PrintWriter( include_file);

			//create class documentation
			//select template
			ConstructorDoc[] constructors = classdoc.constructors();
			String classdoc_content = new String(
				( constructors.length > 0) ? constructor_template : class_template);
			//fill in fields
			String classdoc_description = classdoc.commentText();
			if( classdoc_description == null || classdoc_description.isEmpty())
				System.out.printf(
					"[Warning]: Class %s is missing a description.\n",
					class_name);

			String syntax_content = "";
			String parameter_content = "";
			//if this class has constructors
			if( constructors.length > 0){
				//constructor- specific variables
				Vector<String> syntax_lines = new Vector<String>();
				Map<String, String> parameters = new HashMap<String, String>();
				//document syntax
				for( ConstructorDoc constructordoc : constructors){
					String constructor_name = constructordoc.name();
					//warn user of any missing documentation
					if( constructordoc.paramTags().length < constructordoc.parameters().length)
						System.out.printf(
							"[Warning]: Class %s is missing documentation for some parameters of %s().\n",
							class_name, constructor_name);

					//collect parameters
					for( ParamTag paramtag : constructordoc.paramTags())
						if( parameters.get( paramtag.parameterName()) == null)
							parameters.put( paramtag.parameterName(),
								getParamLine( paramtag));

					//construct this overload's line
					String constructor_content = constructor_name + "( ";
					boolean first = true;
					for( Parameter parameter : constructordoc.parameters()){
						constructor_content +=
							( first ? "" : ", ") + parameter.name();
						if( first) first = false;
					}
					constructor_content += " )<br>\n";
					//add this line
					syntax_lines.add( constructor_content);
				}
				
				//sort syntax lines
				Collections.sort( syntax_lines);
				//put syntax lines back together
				for( String line : syntax_lines)
					syntax_content += line;

				//write parameters
				Vector<String> param_lines = new Vector<String>( parameters.values());
				//sort param lines
				Collections.sort( param_lines);
				//put param lines back together
				for( String line : param_lines)
					parameter_content += line;
			}

			//insert content
			classdoc_content = classdoc_content.replace( "$Name", class_name);
			classdoc_content = classdoc_content.replace( "$Description", classdoc_description);
			classdoc_content = classdoc_content.replace( "$Syntax", syntax_content);
			classdoc_content = classdoc_content.replace( "$Parameters", parameter_content);

			//write file
			File classdoc_file = classdoc_path.resolve( class_name + ".php").toFile();
			writeFile( classdoc_file, classdoc_content);
			//add file to this class' include file
			include_writer.println( getIncludeLine( classdoc_file, class_name));

			//collect the similarly method overloads
			MethodDoc[] methods = classdoc.methods();
			Map<String, Vector<MethodDoc>> methodMap =
				new HashMap<String, Vector<MethodDoc>>( methods.length);
			//for every method
			for( MethodDoc methoddoc : methods){
				//get the method's name
				String method_name = methoddoc.name();
				Vector<MethodDoc> value = methodMap.get( method_name);
				//if we don't already have this method in map
				if( value == null){
					//register new collection
					value = new Vector<MethodDoc>();
					methodMap.put( method_name, value);
				}
				//add this version to collection
				value.add( methoddoc);
			}

			//iterate through all the functions
			for( Vector<MethodDoc> method : methodMap.values()){
				//content fields
				String method_name = method.get(0).name();
				String method_description = method.get(0).commentText();
				Vector<String> syntax_lines = new Vector<String>();
				Map<String, String> parameters = new HashMap<String, String>();
				syntax_content = "";
				parameter_content = "";
				String return_content = "";
				//document syntax
				for( MethodDoc overload : method){
					//warn user of any missing documentation
					if(
						overload.paramTags().length < overload.parameters().length)
						System.out.printf(
							"[Warning]: Class %s is missing documentation for some parameters of %s().\n",
							class_name, method_name);

					//collect parameters
					for( ParamTag paramtag : overload.paramTags())
						if( parameters.get( paramtag.parameterName()) == null)
							parameters.put( paramtag.parameterName(),
								getParamLine( paramtag));

					//construct this overload's line
					String overload_content = method_name + "( ";
					boolean first = true;
					for( Parameter parameter : overload.parameters()){
						overload_content +=
							( first ? "" : ", ") + parameter.name();
						if( first) first = false;
					}
					overload_content += " )<br>\n";
					//add this line
					syntax_lines.add( overload_content);
					return_content += overload.returnType().typeName() + "<br>\n";
				}
				
				//sort syntax lines
				Collections.sort( syntax_lines);
				//put syntax lines back together
				for( String line : syntax_lines)
					syntax_content += line;

				//write parameters
				Vector<String> param_lines = new Vector<String>( parameters.values());
				//sort param lines
				Collections.sort( param_lines);
				//put param lines back together
				for( String line : param_lines)
					parameter_content += line;

				//insert content
				String method_content = new String( function_template);
				method_content = method_content.replace(
					"$Name", method_name);
				method_content = method_content.replace(
					"$Description", method_description);
				method_content = method_content.replace(
					"$Syntax", syntax_content);
				method_content = method_content.replace(
					"$Parameters", parameter_content);
				method_content = method_content.replace(
					"$Returns", return_content);

				//write file
				File methoddoc_file = classdoc_path.resolve(
					method_name + ".php").toFile();
				writeFile( methoddoc_file, method_content);
				//add file to this class' include file
				include_writer.println(
					getIncludeLine( methoddoc_file, method_name));
			}
			//finish up
			include_writer.close();
		}
		return true;
	}

	// io utility methods
	static String readFile( String path) 
			throws IOException {
		byte[] encoded = Files.readAllBytes( Paths.get(path));
		return StandardCharsets.UTF_8.decode(
			ByteBuffer.wrap( encoded)).toString();
	}
	static void writeFile( File file, String content)
			throws FileNotFoundException {
		PrintWriter writer = new PrintWriter( file);
		writer.print( content);
		writer.close();
	}

	//other utility methods
	static String getIncludeLine( File file, String name){
		Path path = file.toPath();
		File link = path.iterator().next().relativize( path).toFile();
		return String.format(
			"<a href=\"/smt/%s\">%s</a><br>",
			link.toString(), name);
	}
	static String getParamLine( ParamTag parameter){
		return String.format(
			"<div class=\"paramTitle\">%s :</div>" +
			"<div class=\"paramDescription\">%s</div><br>",
			parameter.parameterName(), parameter.parameterComment());
	}
}