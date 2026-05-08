let $books := doc("bib.xml")/bib/book[author = "Abiteboul"]
return count($books)