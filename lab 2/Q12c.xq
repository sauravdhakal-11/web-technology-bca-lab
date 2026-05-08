for $a in distinct-values(doc("bib.xml")/bib/book/author)
let $count := count(doc("bib.xml")/bib/book[author = $a])
return
    <author_stats>
        <name>{$a}</name>
        <book_count>{$count}</book_count>
    </author_stats>