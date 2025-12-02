
    local file = io.open("my_file.txt", "w")  -- "w" for write mode
 --   micro.InfoBar():Message("Minimal command executed!")
    if file then
        file:write("Hello, World!\n")
        file:close()  -- Close the file when done
    else
        print("Could not open file")
    end
