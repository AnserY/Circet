
from sys import argv
import urllib2,codecs


html_code = codecs.open(argv[1], 'r')
new_html_code = open(argv[2]+"/"+argv[3]+".html","w")
html_code_list = html_code.readlines()
cpy=False
data = ""
for line in html_code_list:
    line = line.strip()

    if '<em>'+argv[4]+'</em>' in line:
        cpy = True
    if '<!-- ************************************************************************** -->' in line:
        cpy = False
    if cpy:
        data += line

new_html_code.write(data)
