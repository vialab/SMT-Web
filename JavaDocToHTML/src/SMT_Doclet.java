import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;
import java.util.Vector;

import com.sun.javadoc.ClassDoc;
import com.sun.javadoc.ConstructorDoc;
import com.sun.javadoc.MethodDoc;
import com.sun.javadoc.ParamTag;
import com.sun.javadoc.RootDoc;

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

		// Create file 
		FileWriter coFstream = new FileWriter("Need_Comments.txt");
		BufferedWriter coOut = new BufferedWriter(coFstream);
		
		
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
					// If class has constructors, read in function template
					System.out.println("Reading in template: constructorTemplate.html");
					classHTML = new Scanner( new File("constructorTemplate.html") ).useDelimiter("\\A").next();
					
					constructFlag = true;
				} else {
					// If class does not have any constructors, read in class template
					System.out.println("Reading in template: classTemplate.html");
					classHTML = new Scanner( new File("classTemplate.html") ).useDelimiter("\\A").next();
				}
				
				// Set name and description
				String name = classes[i].name();
				String description = classes[i].commentText();
				
				// Does a comment exist?
				if(classes[i].commentText().equals(null) || classes[i].commentText().equals("")){
					coOut.write(classes[i].name() + " missing description at top of class \n");
				}
				
				// If class has constructors, get syntax of initialisation and parameters
				if(constructFlag){
					String syntax = "";
					String parameters = "";
					ArrayList<ParamTag> pTags = new ArrayList<ParamTag>();
					Vector<String> uniquePTags = new Vector<String>();
					boolean paramFlag = false;
	                
					// Collect all the parameters
	                for(ConstructorDoc constructor: classes[i].constructors()){                	
	                	if(constructor.parameters().length > 0){
	                		paramFlag = true;
	                		
	                		for(ParamTag paramTag: constructor.paramTags()) {
	                			pTags.add(paramTag);
	                		}
	                		
	                		if(constructor.paramTags().length != constructor.parameters().length){
	        					coOut.write(constructor.name() + " missing parameter tags \n");
	                		}
		                	
		                }
					
						// Get the syntax of the constructor initialisation calls
						syntax = syntax.concat(classes[i].name() + "(");
						
						for(int k = 0; k < constructor.parameters().length; k++){
							syntax = syntax.concat(constructor.parameters()[k].name() + ", ");
							
							if(k == constructor.parameters().length -1)
								syntax = syntax.substring(0, syntax.length()-2);
						}
						
						syntax = syntax.concat(")<br>");
	                }
	                
	                if(paramFlag){
	                	parameters = paramStart;
	                	
		                for(ParamTag paramTag: pTags){
		                	if(!uniquePTags.contains(paramTag.parameterName())){
		                		uniquePTags.add(paramTag.parameterName());
		                		parameters = parameters.concat("<div class=\"paramTitle\">" + paramTag.parameterName() + ": </div>");
		                		parameters = parameters.concat("<div class=\"paramDescription\">" + paramTag.parameterComment() + "</div>\n<br>");
		                	}
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

			// Don't include these methods
			if(Arrays.asList(excludeMethods).contains(classes[i].name())){
				continue;
			}
			
			Map<Object, ArrayList<MethodDoc>> methodMap = new HashMap<Object, ArrayList<MethodDoc>>();
			// Make a list of overloaded methods
			for(MethodDoc m: classes[i].methods()){
				ArrayList<MethodDoc> methodArray;
				
				if(methodMap.containsKey(m.name())){
					methodArray = methodMap.get(m.name());
					
				} else {
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
				

				String description = firstMethod.commentText();
				
				String syntax = "";
				String parameters = "";
				boolean paramFlag = false;
				ArrayList<ParamTag> pTags = new ArrayList<ParamTag>();
				Vector<String> uniquePTags = new Vector<String>();
				Vector<String> uniqueReType = new Vector<String>();
				String returns = "";
				               	
                	
				
				for(MethodDoc method: ((ArrayList<MethodDoc>) methodMap.get(mName))){
					// Get unique return types
					String reType = method.returnType().typeName();
					if(!uniqueReType.contains(reType)){
                		uniquePTags.add(reType);
                		returns = returns.concat(reType + " <br>");
					}
					
					// Get all the parameter tags for the (overloaded) method(s)
					if(method.parameters().length > 0){
						paramFlag = true;
                		for(ParamTag paramTag: method.paramTags()) {
                			pTags.add(paramTag);
                		}
                		
                		// Missing JavaDoc parameter tags?
                		if(method.paramTags().length != method.parameters().length){
        					coOut.write(classes[i].name() + " " + method.name() + " missing parameter tags \n");
                		}
	                	
	                }	

					
					syntax = syntax.concat(method.name() + "(");

					for(int k = 0; k < method.parameters().length; k++){
						syntax = syntax.concat(method.parameters()[k].name() + ", ");
						
						if(k == method.parameters().length -1)
							syntax = syntax.substring(0, syntax.length()-2);
					}
					
					syntax = syntax.concat(")<br>");
				}
				
				if(paramFlag){
                	parameters = paramStart;
					for(ParamTag paramTag: pTags){
	                	if(!uniquePTags.contains(paramTag.parameterName())){
	                		uniquePTags.add(paramTag.parameterName());
	                		parameters = parameters.concat("<div class=\"paramTitle\">" + paramTag.parameterName() + ": </div>");
	                		parameters = parameters.concat("<div class=\"paramDescription\">" + paramTag.parameterComment() + "</div>\n<br>");
	                	}
	                }						
	            	
	            	parameters = parameters.concat("</div> \n </div><br>");
				}
				
				
				// Replace holders with content
				System.out.println("Replacing content");
				functionHTML = functionHTML.replace("$Name", name);
				functionHTML = functionHTML.replace("$Description", description);
				functionHTML = functionHTML.replace("$Syntax", syntax);
				functionHTML = functionHTML.replace("$Parameters", parameters);
				functionHTML = functionHTML.replace("$Returns", returns);
				
				// Write out HTML file
				System.out.println("Making file " + classFolder + "/" + firstMethod.name() + ".html");
				
				// Create file 
				FileWriter classFstream = new FileWriter(classFolder + "/" + firstMethod.name() + ".html");
				BufferedWriter classOut = new BufferedWriter(classFstream);
				classOut.write(functionHTML);
				//Close the output stream
				classOut.close();
				
				
				// Does description comment exist?
				if(description.equals(null) || description.equals("")){
					coOut.write(classes[i].name() + " " + firstMethod.name() + " is missing description \n");
				}
				
			}
			
			
		}
		coOut.close();

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
