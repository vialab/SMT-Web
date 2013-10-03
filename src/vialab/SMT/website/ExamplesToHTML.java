package vialab.SMT.website;

//local library imports
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.FilenameFilter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;


public class ExamplesToHTML {

	public static void main(String[] args){
		
		String dir = "../../SMT/examples/";
		String webFolder = "../SMT-Website/";
		
		ArrayList<String> folders = new ArrayList<String>();
		
		try {
			folders = examplesPage.write(dir, webFolder);}
		catch (IOException e) {
			System.out.println("Error in writing examples.html");
			e.printStackTrace();}
		
		String exampleTemp = "";
		
		try {
			exampleTemp = new Scanner( new File("exampleTemplate.html") ).useDelimiter("\\A").next();}
		catch (FileNotFoundException e) {
			System.out.println("Error in reading exampleTemplate.html");
			e.printStackTrace();}
		
		// create new filename filter
		FilenameFilter fileNameFilter = new FilenameFilter() {
			@Override
			public boolean accept(File dir, String name) {
				if(name.lastIndexOf('.') > 0){
					// get last index for '.' char
					int lastIndex = name.lastIndexOf('.');
					// get extension
					String str = name.substring(lastIndex);
					// match path name extension
					if(str.equals(".pde"))
						return true;
				}
				return false;
			}
		};
		

		for(String s: folders){
			String egFolder = webFolder + "examples/" + s;
			new File(egFolder).mkdirs();
			
			File[] myFiles = new File(dir + s).listFiles();
			for(File f: myFiles){
				if(f.isDirectory()){
					String html = exampleTemp;
					String fileDir = dir + s + "/" + f.getName() + "/";
					File[] pde = new File(fileDir).listFiles(fileNameFilter);
					String example = "";
					
					int numPDEs = 0;
					
					// Find number of PDE files in example
					for(File pf: pde)
						if(pf.isFile())
							numPDEs++;
					
					try {
						if(numPDEs == 1)
							example = new Scanner( new File(fileDir + pde[0].getName()) ).useDelimiter("\\A").next();
						else if(numPDEs > 1){
							//Find main pde file
							int mainPDE = -1;
							for(int i = 0; i < numPDEs; i++)
								if(pde[i].getName().substring(0, pde[i].getName().length() - 4).equalsIgnoreCase(f.getName())){
									mainPDE = i;
									example = example.concat(new Scanner( new File(fileDir + pde[mainPDE].getName()) ).useDelimiter("\\A").next());
									example = example.concat("</code></pre><pre><code>");
									break;
								}
							
							for(int i = 0; i < numPDEs; i++)
								if(i != mainPDE){
									example = example.concat(new Scanner( new File(fileDir + pde[i].getName()) ).useDelimiter("\\A").next());

									if(i < numPDEs - 2){
										example = example.concat("</code></pre><pre><code>");
									}
								}
						}
					}
					catch (FileNotFoundException e) {
						System.out.println("Error in reading " + pde[0].getName());
						e.printStackTrace();
					}
					
					//String pdeName = pde[0].getName().substring(0, pde[0].getName().length() - 4);
					String pdeName = f.getName();

					html = html.replace("$Name", pdeName);
					html = html.replace("$Code", example);
					
					
					
					System.out.println("Making file " + egFolder + "/" + f.getName() + ".pde");				
					// Create file 
					FileWriter egFstream;
					
					try {
						egFstream = new FileWriter(egFolder + "/" + pdeName  + ".html");
						BufferedWriter egOut = new BufferedWriter(egFstream);
						egOut.write(html);
						//Close the output stream
						egOut.close();
					} catch (IOException e) {
						System.out.println("Error in writing " + pde[0].getName() + ".html");
						e.printStackTrace();
					}
					
				}
			}
		}
		
		
		
	}
}
