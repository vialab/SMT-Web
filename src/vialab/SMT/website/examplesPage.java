package vialab.SMT.website;

//local library imports
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

public class examplesPage {

	public static ArrayList<String> write(String dir, String webFolder) throws IOException{
		File[] files = new File(dir).listFiles();
		ArrayList<String> folders = new ArrayList<String>();
		
		for(File f: files){
			if(f.isDirectory()) folders.add(f.getName());			
		}
		
		String examplesPage = new Scanner( new File("examplesPageTemplate.html") ).useDelimiter("\\A").next();
		String examplesContent = "";
		
		for(String s: folders){
			examplesContent = examplesContent.concat("<div class=\"span4 example\"> \n <h4>" +  s + "</h4> \n");
			
			File[] myFiles = new File(dir + s).listFiles();
			for(File f: myFiles){
				if(f.isDirectory()){
					examplesContent = examplesContent.concat("<a href=\"examples/" + s + "/" + f.getName() + ".html\">" + f.getName() + "</a><br> \n");
				}
			}
			examplesContent = examplesContent.concat("</div><!--/span-->");
		}
		
		//examplesContent = examplesContent.concat("");
		examplesPage = examplesPage.replace("$Content", examplesContent);
		
		System.out.println("Making file " + webFolder + "/examples.html");				
		// Create file 
		FileWriter egFstream = new FileWriter(webFolder + "/examples.html");
		BufferedWriter egOut = new BufferedWriter(egFstream);
		egOut.write(examplesPage);
		//Close the output stream
		egOut.close();
		
		return folders;
	}
}
