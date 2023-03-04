<html><body><pre>
<?php
#  test_file_put_contents.php
#- Copyright (c) 2009 HerongYang.com. All Rights Reserved.
#
  echo "Output from whoami:\n";
  echo `whoami`."\n";

  echo "Output from getcwd():\n";
  echo getcwd()."\n";

  echo "test file_put_contents("./log.html", "tfest", FILE_APPEND | LOCK_EX);:\n";
 file_put_contents("./log.html", "tfest", FILE_APPEND | LOCK_EX);
  echo `ls -l ./log.html`."\n";

  echo "test file_put_contents(/tmp/tmp-tmp.tmp):\n";
  file_put_contents("/tmp/tmp-tmp.tmp", "File in the /tmp directory.");
  echo `ls -l /tmp/tmp-tmp.tmp`."\n";
?>
</pre></body></html>
