<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" indent="yes"/>

    <xsl:template match="/">
        <processed-catalog>
            <xsl:for-each-group select="inventory/product[quantity >= 10]" group-by="category">
                
                <category name="{current-grouping-key()}">
                    
                    <xsl:for-each select="current-group()">
                        <xsl:sort select="price" data-type="number" order="descending"/>
                        
                        <product name="{productname}">
                            <category><xsl:value-of select="category"/></category>
                            <price><xsl:value-of select="price"/></price>
                            <quantity><xsl:value-of select="quantity"/></quantity>
                            
                            <total-price>
                                <xsl:value-of select="price * quantity"/>
                            </total-price>
                        </product>
                        
                    </xsl:for-each>
                </category>
                
            </xsl:for-each-group>
        </processed-catalog>
    </xsl:template>
</xsl:stylesheet>