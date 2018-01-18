<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match = "/">
	<html>
	<body>
		<table border = "1" style = "margin:100px auto;">
			<tr bgcolor = "#d99749">
				<th>Ime</th>
				<th>Prezime</th>
				<th>Email</th>
				<th>Broj telefona</th>
			</tr>
			<xsl:for-each select = "kontakti/kontakt">
			<tr bgcolor = "#EEE8CD">
				<td><xsl:value-of select = "ime"/></td>
				<td><xsl:value-of select = "prezime"/></td>
				<td><xsl:value-of select = "email"/></td>
				<td><xsl:value-of select = "telefon"/></td>
			</tr>
			</xsl:for-each>
		</table>
	</body>
	</html>
</xsl:template>
</xsl:stylesheet>