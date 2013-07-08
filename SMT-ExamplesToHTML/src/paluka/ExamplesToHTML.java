package paluka;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.FilenameFilter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;


public class ExamplesToHTML {

	public static void main(String[] args) throws IOException{
		
		String dir = "../../SMT/examples/";
		String webFolder = "../SMT-Website/";
		
		ArrayList<String> folders = examplesPage.write(dir, webFolder);
		
		String exampleTemp = new Scanner( new File("exampleTemplate.html") ).useDelimiter("\\A").next();
		
		
		// create new filename filter
        FilenameFilter fileNameFilter = new FilenameFilter() {
  
           @Override
           public boolean accept(File dir, String name) {
              if(name.lastIndexOf('.') > 0)
              {
                 // get last index for '.' char
                 int lastIndex = name.lastIndexOf('.');
                 
                 // get extension
                 String str = name.substring(lastIndex);
                 
                 // match path name extension
                 if(str.equals(".pde"))
                 {
                    return true;
                 }
              }
              return false;
           }
        };
		

		for(String s: folders){
			String egFolder = webFolder + "/examples/" + s;
			new File(egFolder).mkdirs();
			
			File[] myFiles = new File(dir + s).listFiles();
			for(File f: myFiles){
				if(f.isDirectory()){
					String html = exampleTemp;
					String fileDir = dir + s + "/" + f.getName() + "/";
					File[] pde = new File(fileDir).listFiles(fileNameFilter);
					String example = new Scanner( new File(fileDir + pde[0].getName()) ).useDelimiter("\\A").next();
					
					String pdeName = pde[0].getName().substring(0, pde[0].getName().length() - 4);
					
					html = html.replace("$Name", pdeName);
					html = html.replace("$Code", example);
					
					System.out.println("Making file " + egFolder + "/" + pde[0].getName());				
					// Create file 
					FileWriter egFstream = new FileWriter(egFolder + "/" + pdeName  + ".html");
					BufferedWriter egOut = new BufferedWriter(egFstream);
					egOut.write(html);
					//Close the output stream
					egOut.close();
				}
			}
		}
		
		
		
	}
}
