
from sys import argv
import urllib2,codecs


html_code = codecs.open("1566288861_SyntheseResolutionaJHebdo-S332019.html", 'r')
new_html_code = open(argv[1]+"/"+argv[2]+".html","w")
html_code_list = html_code.readlines()
cpy=False
data = ""
for line in html_code_list:
    line = line.strip()

    if '<em>'+argv[3]+'</em>' in line:
        cpy = True
    if '<!-- ************************************************************************** -->' in line:
        cpy = False
    if cpy:
        data += line

new_html_code.write(data)
