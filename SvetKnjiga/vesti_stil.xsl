<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match = "/">
<html>
<body>
	<xsl:for-each select = "rss/channel">
		<div style = "background-color:#d99749; text-align:center; font-size:25px">
			<xsl:value-of select="title"/>
		</div>
		<xsl:for-each select = "item">
			<div style = "background-color:#EEE8CD; text-align:center;">
			<ul style = "text-decoration:none; list-style-type: none;">
				<li><xsl:value-of select="title"/></li>
				<li><xsl:value-of select="link"/></li>
				<li><xsl:value-of select="description"/></li>
			</ul>
			</div>
		</xsl:for-each>
	</xsl:for-each>
</body>
</html>
</xsl:template>
</xsl:stylesheet>