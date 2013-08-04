<?php

if ($device['os'] == "macosx")
{
  list(,,$version) = explode (" ", $poll_device['sysDescr']);
  $hardware = rewrite_unix_hardware($poll_device['sysDescr']);

  $version = rewrite_macosx_version($version);
}

function rewrite_macosx_version($version)
{
  if (preg_match('/^1.2/i', $version)) { $cat = 'Kodiak'; }
  elseif (preg_match('/^1.3|^1.4/i', $version)) { $cat = 'Cheetah'; }
  elseif (preg_match('/^5/i', $version)) { $cat = 'Puma'; }
  elseif (preg_match('/^6/i', $version)) { $cat = 'Jaguar'; }
  elseif (preg_match('/^7/i', $version)) { $cat = 'Panther'; }
  elseif (preg_match('/^8/i', $version)) { $cat = 'Tiger'; }
  elseif (preg_match('/^9/i', $version)) { $cat = 'Leopard'; }
  elseif (preg_match('/^10/i', $version)) { $cat = 'Snow Leopard'; }
  elseif (preg_match('/^11/i', $version)) { $cat = 'Lion'; }
  elseif (preg_match('/^12/i', $version)) { $cat = 'Mountain Lion'; }
  else { $cat = 'Unknown'; }

  return ($cat . " (" . $version . ")");
}
?>
