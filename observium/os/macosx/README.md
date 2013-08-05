# Mac OS X Support for Observium
This will add Mac OS X support to Observium

## Observium Instructions
Copy the files to the correct directories.

Set the following variables in config.php

	$os = "macosx";
	$config['os'][$os]['text']              = "Mac OS X";
	$config['os'][$os]['type']              = "workstation";
	$config['os'][$os]['over'][0]['graph']  = "device_processor";
	$config['os'][$os]['over'][0]['text']   = "Processors";

## Enable SNMP on Mac OS X
Open a terminal and make a back-up of the orignal snmpd.conf

	sudo mv /etc/snmp/snmpd.conf /etc/snmp/snmpd.conf.org

Update the snmpd.conf

	sudo vi /etc/snmp/snmpd.conf

An example:

	#Allow read-access with the following SNMP Community String:
	rocommunity public
		
	# all other settings are optional but recommended.
	
	# Location of the device
	syslocation data centre A
	
	# Human Contact (mailaddress) for the device
	syscontact SysAdmin@example.org
	
	# System Name of the device
	sysName SystemName
	
	# the system OID for this device. This is optional but recommended,
	# to identify this as a MAC OS system.
	sysobjectid 1.3.6.1.4.1.8072.3.2.16

Start the SNMP service with the following command:

	sudo launchctl load -w /System/Library/LaunchDaemons/org.net-snmp.snmpd.plist

Stop the SNMP service:

	sudo launchctl unload -w /System/Library/LaunchDaemons/org.net-snmp.snmpd.plist
