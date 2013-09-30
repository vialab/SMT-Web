package vialab.SMT.website;

//local library imports
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Scanner;

//javadoc library imports
import com.sun.javadoc.ClassDoc;
import com.sun.javadoc.MethodDoc;

//Creates reference.html with the classes and their functions
public class referenceWriter {

	public static void write(ClassDoc[] classes) throws IOException{

		// Read in reference template
		System.out.println("Reading in template: referenceTemplate.html");
		String folder = "../SMT-Website/";
		String refHTML = new Scanner( new File("referenceTemplate.html") ).useDelimiter("\\A").next();
		String refContent = "";

		for (int i = 0; i < classes.length; i++) {
			if(SMT_Doclet.exclude(classes, i))
				continue;

			String path = "<a href=\"reference/" + classes[i].name() + "/";
			// Set class name
			refContent = refContent.concat("<div class=\"span4 function\"> \n <h4>" + classes[i].name() + "</h4> \n");
			// set link to class page
			refContent = refContent.concat(path + classes[i].name() + ".html\">" + classes[i].name() + "</a><br>\n");

			if(Arrays.asList(SMT_Doclet.excludeMethods).contains(classes[i].name())){
				refContent = refContent.concat("</div>");
				continue;
			}
			ArrayList<MethodDoc> uniqueMethods = findUniqueMethods(classes[i]);

			for(MethodDoc method: uniqueMethods){
				//System.out.println("  method: " + methods[j]);
				refContent = refContent.concat(path + method.name() + ".html\">" + method.name() + "()</a><br>\n");
			}
			refContent = refContent.concat("</div>");
		}

		refHTML = refHTML.replace("$content", refContent);

		System.out.println("Making file " + folder + "/reference.html");
		// Create file
		FileWriter refFstream = new FileWriter(folder + "/reference.html");
		BufferedWriter refOut = new BufferedWriter(refFstream);
		refOut.write(refHTML);
		//Close the output stream
		refOut.close();
	}

	// Find unique methods in class
	public static ArrayList<MethodDoc> findUniqueMethods(ClassDoc cDoc){
		ArrayList<MethodDoc> uniqueMethods = new ArrayList<MethodDoc>();
		ArrayList<String> names = new ArrayList<String>();

		for(MethodDoc m: cDoc.methods()){
			if(!names.contains(m.name())){
				uniqueMethods.add(m);
				names.add(m.name());
			}
		}
		return uniqueMethods;
	}
}
