for $b in doc("bib.xml")/bib/book
order by number($b/price)
return $b/title