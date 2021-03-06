G2 Compressor
=============

Concat and compress js and css files.

Contributors
------------

* [Draško Gomboc](https://github.com/gomboc)
* [Ivan Kričković](https://github.com/ivankoni)

Requirements
------------

* PHP 5.2 (or later) but PHP 5.3 (or later) is highly recommended.
* YUI Compressor 2.4.2 (or later) [yui-compressor package](http://packages.ubuntu.com/lucid/yui-compressor)

Install
-------

G2 Compressor should be installed using the PEAR Installer ([PHP Extension and Application Repository](http://pear.php.net/)). 

The following two commands (which you may have to run as `root`) are all that is required to install package using the PEAR Installer:

    $ pear channel-discover gomboc.github.com/pear
    $ pear install g2/G2_Compressor

After the installation you can find the source files inside your local PEAR directory; the path is usually `/usr/share/php/G2`.

Uninstall
---------

Remove package (run as `root`):

	$ pear uninstall g2/G2_Compressor
	
Documentation
-------------

#### Compress files

Create g2c.properties.xml file in your project directory:

	<?xml version="1.0" encoding="UTF-8"?>
	<g2c>
		<compress>
			<name>file-name</name>
			<type>file-type</type>
			<destination>destination-directory</destination>
			<files>
				<file>source-file</file>
			</files>
		</compress>	
	</g2c>

Run the following command:

	$ g2-compress
	
#### Project

Add to your Bootstrap file:

	require_once 'G2/Compressor/Head.php';
	
To manually set path to properties file:

	G2_Compressor_Head::getInstance()->setCompressorProperties( '<path-to-file>' );
	
Add to appropriate place in your project

CSS
	
	G2_Compressor_Head::getInstance()->appendCss( 'file-name' );
	
JavaScript

	G2_Compressor_Head::getInstance()->appendJavaScipt( 'file-name' );

Development
-----------

To run example:

	$ cd example
	$ ../g2-compress
	
License
-------

Copyright (c) 2012 Draško Gomboc

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
