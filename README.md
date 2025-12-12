This is a fork of @zyedidia's micro which i thought to maybe eventually repurpose to the end of creating a
  regex101.com TUI app using micro as the basis, but 
  noting new [insight](https://github.com/zyedidia/micro/issues/3279#issuecomment-2088934103) 
  that was uncovered, specifically that
   ```[micro] works on individual lines instead of the
    whole buffer``` would make it harder if not impossible
     to use the native replace to achieve my goal.
      Or rather, treating the buffer as input without
      first piping the whole contents to stdout 
  or something would be a hindrance to my goal 

Currently <code>make build</code> generates ./micro 
program which when run will only does the same as zyedidia's
micro build 98ff79db with the addition of accepting two
 additional command arguments(not as flagged - or -- but
  simple bash strings) for search in the form of 
  +/your_search and, optionally, {#iterations of the 
  search}  e.g.  ./micro my_file.txt +/dog {2}


with the exceptions of scroll up/down, VSplit,HSplit (already 
declared by vsplit/hsplit) & insertenter (for which the
 go compiler noted there isn't an invokeable
  bufpane method by that name) the BufKeyActions from bufpane.go have been
mapped into commands.go, so from within micro, you can now
ctrl+e then type them and hit enter to see what they do
 in directly instead of invoking in a lua plugin

 edit, i went  back to compare the regex output-i accidentally 
 substituted the first capture group from my regex (\t\".*\":\s*)(\(.*),
  and subsequent substitution instead of the second group
  which meant the signatures on the func XYZCmd() were wrong
  on a few functions (unsurprisingly most of the key strings
  matched up to their function equivalents except some 
  functions were kind of "overloaded" with an argumentless
  XYZActionCmd hence action in the name).  I assume there
  was another reason if not also for the fact that vsplit()
  was defined so to disambiguate a little VSplitAction()
  may have been conceived).

here are the functions that, when the bufkeyactions maps are
merged and then the func names in actions.go are regex'd out
then the two lists are diff'd, result:

```
HSplit
HSplitAction
MouseDrag
MouseMultiCursor
MousePress
MouseRelease
MoveCursorDown
MoveCursorUp
Retab
SaveAsCB(action string, callback func
SaveCB(action string, callback func
ScrollAdjust
ScrollDownAction
ScrollReachedEnd
ScrollUpAction
Search
SpawnCursorAtLoc
SpawnMultiCursorUpN
Suspend
VSplit  
VSplitAction
```

The best regex-oriented tui i've seen is [this fork](https://github.com/andriy-git/rexi/tree/master) of rexi (the main rexi is linked to on their project page).
