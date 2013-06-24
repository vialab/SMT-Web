import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;

import com.sun.javadoc.ClassDoc;
import com.sun.javadoc.ConstructorDoc;
import com.sun.javadoc.FieldDoc;
import com.sun.javadoc.MethodDoc;
import com.sun.javadoc.ParamTag;
import com.sun.javadoc.ProgramElementDoc;
import com.sun.javadoc.RootDoc;
import com.sun.javadoc.Tag;

public class SMT_Doclet {
	// Exclude these classes from being included in the website
	static String[] exclude = {"PGraphicsDelegate", "MouseToTUIO"};
	
	//Exclude these classes' methods
	static String[] excludeMethods = {"TouchSource", "TouchDraw"};
	
	
	// HTML for beginning of parameter div
	static String paramStart = "<div class=\"row-fluid referenceRow\"> \n" +
			"<div class=\"referenceTag\">Parameters</div> \n" +
			"<div class=\"referenceDescriptor\"> \n";
			
	
	public static boolean start(RootDoc root) throws IOException {
		ClassDoc[] classes = root.classes();
		System.out.println("Starting...");
		
		// Create reference.html with the classes and their functions
		referenceWriter.write(classes);

		
		
		
		for (int i = 0; i < classes.length; i++) {
			//System.out.println(classes[i]);
			if(exclude(classes, i)) 
				continue;
			
			String classFolder = "../SMT-Website/reference/" + classes[i].name();
			try{
				
				// Make Class directory
				System.out.println("Making Directory " + classes[i].name());
				
				new File(classFolder).mkdirs();
				String classHTML = "";
				boolean constructFlag = false;
						
				if(classes[i].constructors().length > 0){
					// Read in function template
					System.out.println("Reading in template: constructorTemplate.html");
					classHTML = new Scanner( new File("constructorTemplate.html") ).useDelimiter("\\A").next();
					
					constructFlag = true;
				} else {
					// Read in class template
					System.out.println("Reading in template: classTemplate.html");
					classHTML = new Scanner( new File("classTemplate.html") ).useDelimiter("\\A").next();
				}
				
				// Set name and description
				String name = classes[i].name();
				String description = classes[i].commentText();
				
				
				if(constructFlag){
					boolean paramFlag = false;
					String syntax = "";
	                   
	                   
	                for(ConstructorDoc constructor: classes[i].constructors()){
	                	
	                	//char letter = 'a';
						syntax = syntax.concat(classes[i].name() + "(");
						
						if(constructor.parameters().length > 0 && paramFlag == false){
							paramFlag = true;
						}
					
						
						
						for(int k = 0; k < constructor.parameters().length; k++){
							//syntax = syntax.concat(letter + ", ");
							syntax = syntax.concat(constructor.parameters()[k].name() + ", ");
							
							
							
							
							//letter++;
							
							
							if(k == constructor.parameters().length -1)
								syntax = syntax.substring(0, syntax.length()-2);
						}
						
						
						syntax = syntax.concat(")<br>");
	                }
	                
					String parameters = "";

	                if(paramFlag){
	                	parameters = paramStart;
	                	ConstructorDoc firstConstructor = classes[i].constructors()[0];
	                	for(ParamTag paramTag: firstConstructor.paramTags()) {
	                		parameters = parameters.concat("<div class=\"paramTitle\">" + paramTag.parameterName() + ": </div>");
							parameters = parameters.concat("<div class=\"paramDescription\">" + paramTag.parameterComment() + "</div>\n<br>"); 
							
	                	}
	                	parameters = parameters.concat("</div> \n </div><br>");
	                }
					
					
					
					classHTML = classHTML.replace("$Parameters", parameters);
					classHTML = classHTML.replace("$Syntax", syntax);
				}
				
				// Replace holders with content
				System.out.println("Replacing content");
				classHTML = classHTML.replace("$Name", name);
				classHTML = classHTML.replace("$Description", description);
				
				// Write out HTML file
				System.out.println("Making file " + classFolder + "/" + classes[i].name() + ".html");
				
				// Create file 
				FileWriter classFstream = new FileWriter(classFolder + "/" + classes[i].name() + ".html");
				BufferedWriter classOut = new BufferedWriter(classFstream);
				classOut.write(classHTML);
				//Close the output stream
				classOut.close();

				
			}catch (Exception e){//Catch exception if any
				System.err.println("Error: " + e.getMessage());
			}


			/*Tag[] tags = classes[i].tags("jndi-name");
			for (int j = 0; j < tags.length; j++) {
				//System.out.println("  tag: " + tags[j]);                
			}

			FieldDoc fields[] = classes[i].fields();
			for (int j = 0; j < fields.length; j++) {
				//System.out.println("  field: " + fields[j]);
			}*/

			if(Arrays.asList(excludeMethods).contains(classes[i].name())){
				continue;
			}
			
			Map<Object, ArrayList<MethodDoc>> methodMap = new HashMap<Object, ArrayList<MethodDoc>>();
			
			for(MethodDoc m: classes[i].methods()){
				ArrayList<MethodDoc> methodArray;
				
				if(methodMap.containsKey(m.name())){
					methodArray = methodMap.get(m.name());
					
				}else {
					methodArray = new ArrayList<MethodDoc>();
				}
				methodArray.add(m);
				methodMap.put(m.name(), methodArray);
			}
			
			for (Object mName: methodMap.keySet()) {
				//System.out.println("  method: " + methods[j]);
				
				// Read in function template
				System.out.println("Reading in template");
				String functionHTML = new Scanner( new File("functionTemplate.html") ).useDelimiter("\\A").next();
				
				MethodDoc firstMethod = ((ArrayList<MethodDoc>) methodMap.get(mName)).get(0);
				// Set name, description, syntax, parameters and returns
				String name = firstMethod.containingClass().name() + "." + mName + "()";
				
				/*
				 * Only taking the first method's JavaDoc comment as description!!
				 * TODO
				 */
				String description = firstMethod.commentText();
				
				String syntax = "";
				String parameters = "";
				boolean paramFlag = false;
				
				//char letter = 'a';
				for(MethodDoc method: ((ArrayList<MethodDoc>) methodMap.get(mName))){
						
					
					syntax = syntax.concat(method.name() + "(");
					
					if(method.parameters().length > 0 && paramFlag == false){
						paramFlag = true;
					}
	                //parameters = parameters.concat(paramStart);
	                   
	                
					
					for(int k = 0; k < method.parameters().length; k++){
						//syntax = syntax.concat(letter + ", ");
						syntax = syntax.concat(method.parameters()[k].name() + ", ");
						
						//parameters = parameters.concat("<div class=\"paramTitle\">" + method.parameters()[k].name() + "&nbsp;&nbsp;&nbsp;&nbsp; - " + 
						//		method.parameters()[k].typeName() + ": </div>");
						
						//if(method.paramTags().length > k) {
						//	parameters = parameters.concat("<div class=\"paramDescription\">" + method.paramTags()[k].parameterComment() + "</div>\n<br>"); 
						//} else {
						//	parameters = parameters.concat("\n<br>"); 
						//}
						//letter++;
						
						if(k == method.parameters().length -1)
							syntax = syntax.substring(0, syntax.length()-2);
					}
					
					//parameters = parameters.concat("</div> \n </div>");
					syntax = syntax.concat(")<br>");
				}
				
				if(paramFlag){
                	parameters = paramStart;
                	MethodDoc firstmethod = (MethodDoc) methodMap.get(mName).get(0);
                	for(ParamTag paramTag: firstmethod.paramTags()) {
                		parameters = parameters.concat("<div class=\"paramTitle\">" + paramTag.parameterName() + ": </div>");
						parameters = parameters.concat("<div class=\"paramDescription\">" + paramTag.parameterComment() + "</div>\n<br>"); 
						
                	}
                	parameters = parameters.concat("</div> \n </div><br>");
                }
				
				String returns = firstMethod.returnType().typeName();
				
				// Replace holders with content
				System.out.println("Replacing content");
				functionHTML = functionHTML.replace("$Name", name);
				functionHTML = functionHTML.replace("$Description", description);
				functionHTML = functionHTML.replace("$Syntax", syntax);
				
				//if(firstMethod.parameters().length > 0){
					functionHTML = functionHTML.replace("$Parameters", parameters);
				//} else {
				//	functionHTML = functionHTML.replace("$Parameters", "");
				//}
				
				functionHTML = functionHTML.replace("$Returns", returns);
				
				// Write out HTML file
				System.out.println("Making file " + classFolder + "/" + firstMethod.name() + ".html");
				
				// Create file 
				FileWriter classFstream = new FileWriter(classFolder + "/" + firstMethod.name() + ".html");
				BufferedWriter classOut = new BufferedWriter(classFstream);
				classOut.write(functionHTML);
				//Close the output stream
				classOut.close();
				
			}
			
			
		}

		return true;
	}
	
	// Exclude classes in the 'exclude' String array
	public static boolean exclude(ClassDoc[] classes, int i){
		if(Arrays.asList(exclude).contains(classes[i].name())){
			return true;
		}
		
		return false;
	}
	
	
}
