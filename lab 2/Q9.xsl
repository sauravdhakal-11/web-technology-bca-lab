<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
    <html>
    <body style="text-align:center; font-family: Arial;">
        <div style="background-color: green; color: white; padding: 10px; font-weight: bold;">
            Hello Everyone! Welcome to XML to CSS
        </div>
        <xsl:for-each select="syllabus/subject">
            <h2 style="color: green; border-bottom: 1px solid #ccc;"><xsl:value-of select="@name"/></h2>
            <xsl:for-each select="topic">
                <p style="color: blue; margin: 2px;"><xsl:value-of select="."/></p>
            </xsl:for-each>
        </xsl:for-each>
    </body>
    </html>
</xsl:template>
</xsl:stylesheet>