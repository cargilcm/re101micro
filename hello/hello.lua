local micro = import("micro")
local buffer = import("micro/buffer")
local os = import("os")

local onstart = true
local res = "hi"
function onBufPaneOpen(bp)
	if onstart == false then
		return
	end

	local str = "Get"--os.Getenv("FINDSTR")
	if str ~= "" then
		bp:Search(str, false, true)
	end
	onstart = false
end
str = res
local file = io.open("my_file2.txt", "w")  -- "w" for write mode
 --   micro.InfoBar():Message("Minimal command executed!")
    if file then
        file:write(str)
        file:close()  -- Close the file when done
    else
        print("Could not open file")
    end
