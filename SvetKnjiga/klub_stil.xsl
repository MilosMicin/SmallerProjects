<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match = "/">
	<html>
	<body>
		<table border = "1">
			<tr bgcolor = "#d99749">
				<th>Screen Name</th>
				<th>Email</th>
			</tr>
			<xsl:for-each select = "osobe/osoba">
			<tr bgcolor = "#EEE8CD">
				<td><xsl:value-of select = "name"/></td>
				<td><xsl:value-of select = "email"/></td>
			</tr>
			</xsl:for-each>
		</table>
	</body>
	</html>
</xsl:template>
</xsl:stylesheet>