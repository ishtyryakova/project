function delete_position (path, text)	{
	if (confirm (text))	{
		location.href = path;
	}
	
	return false;
}