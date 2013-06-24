static String fileDirectory = "Files";
	static String HTMLDirectory = "HTML";
	
	public static void main(String[] args) throws IOException{
		String header = new Scanner( new File("header.html") ).useDelimiter("\\A").next();
		String footer = new Scanner( new File("footer.html") ).useDelimiter("\\A").next();
		
		for(int i = 0; i < new File(fileDirectory).list().length; i++){
			for(File file: new File(fileDirectory).listFiles()){
				String fileString = new Scanner(file).useDelimiter("\\A").next();
				fileString = fileString.replace("$Header", header);
				fileString = fileString.replace("$Footer", footer);
				
				// Create file 
				FileWriter fstream = new FileWriter(HTMLDirectory + "/" + file.getName() + ".html");
				BufferedWriter out = new BufferedWriter(fstream);
				out.write(fileString);
				//Close the output stream
				out.close();
			}
		}
		
	}