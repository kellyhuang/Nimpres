/**
 * Project:			Nimpres Android Client
 * File name: 		Presentation.java
 * Date modified:	2011-03-06
 * Description:		Represents a presentation
 * 
 * License:			Copyright (c) 2011 (Matthew Brooks, Jordan Emmons, William Kong)
					
					Permission is hereby granted, free of charge, to any person obtaining a copy
					of this software and associated documentation files (the "Software"), to deal
					in the Software without restriction, including without limitation the rights
					to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
					copies of the Software, and to permit persons to whom the Software is
					furnished to do so, subject to the following conditions:
					
					The above copyright notice and this permission notice shall be included in
					all copies or substantial portions of the Software.
					
					THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
					IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
					FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
					AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
					LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
					OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
					THE SOFTWARE.
 */
package com.nimpres.android.presentation;

public class Presentation {
	private String title = "";
	private String path = "";
	private String owner = "";
	private int timestamp = 0;
	private int numSlides = 0;
	private int currentSlide = 0;
	private Slide[] slideFiles;
	private boolean paused = false;
	private int presentationID = 0;
	
	/**
	 * @return the owner
	 */
	public String getOwner() {
		return owner;
	}

	/**
	 * @param owner the owner to set
	 */
	public void setOwner(String owner) {
		this.owner = owner;
	}

	/**
	 * @return the path
	 */
	public String getPath() {
		return path;
	}

	/**
	 * @param path the path to set
	 */
	public void setPath(String path) {
		this.path = path;
	}

	/**
	 * @return the timestamp
	 */
	public int getTimestamp() {
		return timestamp;
	}

	/**
	 * @param timestamp the timestamp to set
	 */
	public void setTimestamp(int timestamp) {
		this.timestamp = timestamp;
	}	
	
	/**
	 * @return the presentationName
	 */
	public String getTitle() {
		return title;
	}

	/**
	 * @param presentationName the presentationName to set
	 */
	public void setTitle(String title) {
		this.title = title;
	}

	/**
	 * @return the numSlides
	 */
	public int getNumSlides() {
		return numSlides;
	}

	/**
	 * @param numSlides the numSlides to set
	 */
	public void setNumSlides(int numSlides) {
		this.numSlides = numSlides;
	}

	/**
	 * @return the currentSlide
	 */
	public int getCurrentSlide() {
		return currentSlide;
	}

	/**
	 * @param currentSlide the currentSlide to set
	 */
	public void setCurrentSlide(int currentSlide) {
		if(currentSlide < this.numSlides)
			this.currentSlide = currentSlide;
			
	}

	/**
	 * @return the slideFiles
	 */
	public Slide[] getSlideFiles() {
		return slideFiles;
	}

	/**
	 * @param slideFiles the slideFiles to set
	 */
	public void setSlideFiles(Slide[] slideFiles) {
		this.slideFiles = slideFiles;
	}

	public Slide getCurrentSlideFile(){
		if(numSlides > 0)
			return slideFiles[currentSlide];
		else
			return new Slide(); //TODO we should probably create an error dps package and preload it, showing an error image here
	}
	
	public void nextSlide(){
		if(currentSlide < (numSlides-1))
			currentSlide++;
	}
	
	public void previousSlide(){
		if(currentSlide>0)
			currentSlide--;
	}

	/**
	 * @return the paused
	 */
	public boolean isPaused() {
		return paused;
	}

	/**
	 * @param paused the paused to set
	 */
	public void setPaused(boolean paused) {
		this.paused = paused;
	}

	/**
	 * @return the presentationID
	 */
	public int getPresentationID() {
		return presentationID;
	}

	/**
	 * @param presentationID the presentationID to set
	 */
	public void setPresentationID(int presentationID) {
		this.presentationID = presentationID;
	}

}