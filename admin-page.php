<div class="wrap">
<h2>Configure Admin-URL</h2>
<p>This plugin rename the default wp-admin url to a custom one. You've to define it both in wp-config.php and .htaccess</p>
<h3 class="title">wp-config.php</h3>
<pre><code>define('WP_ADMIN_DIR', 'secret-folder');</code>
<code>define('ADMIN_COOKIE_PATH', SITECOOKIEPATH . WP_ADMIN_DIR);</code></pre>
<h3 class="title">.htaccess</h3>
<p>Define the bellow rule on top of .htaccess, before the Wordpress related config.</p>
<pre><code>RewriteRule ^secret-folder/(.*) wp-admin/$1?%{QUERY_STRING} [L]</code></pre>
<h3>Definições Actuais</h3>
<form>
<table class="form-table">
	<tbody>
		<tr>
			<th>WP_ADMIN_DIR</th>
			<td><?php echo WP_ADMIN_DIR; ?></td>
		</tr>
	</tbody>
</table>
</form>
</div>