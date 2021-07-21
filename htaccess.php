RewriteEngine On

RewriteCond %{HTTPS} off 

RewriteCond %{REQUEST_URI} !^/\.well-known/acme-challenge/.+$
RewriteCond %{REQUEST_URI} !^/\.well-known/acme-challenge/[0-9a-zA-Z_-]+$
RewriteCond %{REQUEST_URI} !^/\.well-known/cpanel-dcv/[0-9a-zA-Z_-]+$
RewriteCond %{REQUEST_URI} !^/\.well-known/pki-validation/(?:\ Ballot169)?
RewriteCond %{REQUEST_URI} !^/\.well-known/pki-validation/[A-F0-9]{32}\.txt(?:\ Comodo\ DCV)?$
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L] 

# BEGIN cPanel-generated php ini directives, do not edit
# Manual editing of this file may result in unexpected behavior.
# To make changes to this file, use the cPanel MultiPHP INI Editor (Home >> Software >> MultiPHP INI Editor)
# For more information, read our documentation (https://go.cpanel.net/EA4ModifyINI)
<IfModule php5_module>
   php_flag asp_tags Off
   php_flag display_errors Off
   php_value max_execution_time 30
   php_value max_input_time 600
   php_value max_input_vars 1000
   php_value memory_limit 512M
   php_value post_max_size 8M
   php_value session.gc_maxlifetime 1440
   php_value upload_max_filesize 2M
   php_flag zlib.output_compression Off
</IfModule>
# END cPanel-generated php ini directives, do not edit

RewriteCond %{HTTP_HOST} ^truetimetechnology.in [NC]
RewriteCond %{REQUEST_URI} !^/\.well-known/acme-challenge/.+$
RewriteCond %{REQUEST_URI} !^/\.well-known/acme-challenge/[0-9a-zA-Z_-]+$
RewriteCond %{REQUEST_URI} !^/\.well-known/cpanel-dcv/[0-9a-zA-Z_-]+$
RewriteCond %{REQUEST_URI} !^/\.well-known/pki-validation/(?:\ Ballot169)?
RewriteCond %{REQUEST_URI} !^/\.well-known/pki-validation/[A-F0-9]{32}\.txt(?:\ Comodo\ DCV)?$
RewriteRule ^(.*)$ https://www.truetimetechnology.in/$1 [L,R=301]

# BEGIN cPanel-generated php ini directives, do not edit
# Manual editing of this file may result in unexpected behavior.
# To make changes to this file, use the cPanel MultiPHP INI Editor (Home >> Software >> MultiPHP INI Editor)
# For more information, read our documentation (https://go.cpanel.net/EA4ModifyINI)
<IfModule php5_module>
   php_flag asp_tags Off
   php_flag display_errors Off
   php_value max_execution_time 120
   php_value max_input_time 60
   php_value max_input_vars 1000
   php_value memory_limit 32M
   php_value post_max_size 8M
   php_value session.gc_maxlifetime 1440
   php_value session.save_path "/var/cpanel/php/sessions/ea-php56"
   php_value upload_max_filesize 2M
   php_flag zlib.output_compression Off
</IfModule>
<IfModule lsapi_module>
   php_flag asp_tags Off
   php_flag display_errors Off
   php_value max_execution_time 120
   php_value max_input_time 60
   php_value max_input_vars 1000
   php_value memory_limit 32M
   php_value post_max_size 8M
   php_value session.gc_maxlifetime 1440
   php_value session.save_path "/var/cpanel/php/sessions/ea-php56"
   php_value upload_max_filesize 2M
   php_flag zlib.output_compression Off
</IfModule>
# END cPanel-generated php ini directives, do not edit