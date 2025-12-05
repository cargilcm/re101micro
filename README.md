This is a fork of @zyedidia's micro but i may eventually repurpose it to the end of creating a regex101.com TUI app using micro as the basis.

Currently <code>make build</code> generates ./micro 
program which when run will only does the same as zyedidia's
micro build 98ff79db with the addition of accepting two
 additional command arguments(not as flagged - or -- but
  simple bash strings) for search in the form of 
  +/your_search and, optionally, {#iterations of the 
  search}  e.g.  ./micro my_file.txt +/dog {2}


with the exceptions of scroll up/down, vsplit,hsplit &
insertenter the bufkeuyctions from bufpane.go have been
mapped into commands.go so from within micro you can now
ctrl+e then type them to see what they do in realtime.
