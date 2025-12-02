## Design
you can create a command line search using environment
 variables for your search needle, then you can write
  a plugin in lua to have search run at the time the
  program is run.  [the bindings] (https://github.com/zyedidia/micro/blob/master/runtime%2Fhelp%2Fkeybindings.md) dont expose the entirety
  of the methods available to mods to the source code.

  i enjoyed tweaking micro's source in my own way for a 
  command-line search feature identical to other command-line
  text editors except that it takes this search a bit further.

  future steps include adding search resembling http search,
  to the extent of the w3c uri [text fragments] (https://wicg.github.io/scroll-to-text-fragment/#finding-ranges-in-a-document)
   protocol.

## Philosophy
while linux philosophy is to do one thing exceptionally
well, Micro acheives that as a TUI editor. Yet, my conviction
is that it should afford command line features as much as 
other command-line editors as much as possible.

I've tied in command arguments search from other command-line
editors with the addition of allowing iterations on the
startup search of the syntax {#} where the search will occur
n# times from the beginning of the file.

To achieve this, the program closes any files who filename
follows that syntax before it inits.  in the main tab when 
Micro starts you can still ctrl+o open {#} filenames.. 

## Additional changes
markselect is a plugin that allows marking the text with the alt+l
keybinding or whatever you put in the bindings.json file in
~/.micro 

## Note
This works fine at least in Termux on Android.
