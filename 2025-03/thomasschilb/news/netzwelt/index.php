<html>
<!-- 
  __________  ___ _____________          __________  _________ _________
  \______   \/   |   \______   \         \______   \/   _____//   _____/
   |     ___/    ~    \     ___/  ______  |       _/\_____  \ \_____  \
   |    |   \    Y    /    |     /_____/  |    |   \/        \/        \
   |____|    \___|_  /|____|              |____|_  /_______  /_______  /
                   \/                            \/        \/        \/
  ______________________________________________________________________
 
  PHP-RSS                                                            1.0
  ______________________________________________________________________

MIT License

Copyright (c) 2024 Thomas Schilb

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

mailto:info@thomasschilb.com

-->
<?php
                $dom=new DOMDocument;
				$dom->load('https://feeds.feedburner.com/netzwelt.xml');
                $xp=new DOMXPath( $dom );
                $col=$xp->query( '//channel/item' );

                if( $col->length > 0 ){
                    foreach( $col as $node ){
						printf('<a target="_blank" href="');
                        printf('%s<br>', $xp->query('link',$node)->item(0)->textContent);
						printf('">');
						printf('%s</a><br>', $xp->query('title',$node)->item(0)->textContent);
                    }
                }
//            }
?>