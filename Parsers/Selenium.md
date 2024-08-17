JavaScriptExecutor
	Проименение:
		если локаторы не работают
			желеемые операции с DOM узлами 
			можно проводить с помощью JavaScriptExecutor
		либо для выполнения любых других действий на странице
	СИНТАКСИС:
		driver.execute_script("some javascript code here");
	ПРИМЕРЫ:
		driver=webdriver.Firefox()
		from selenium import webdriver
		driver.get("https://pythonbasics.org")
		js = 'alert("Hello World")'
		driver.execute_script(js)