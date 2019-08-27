#!/home/anser/anaconda2/bin/python2.7

from sys import argv
import codecs




html_code = codecs.open(argv[1], 'r')
new_html_code = open(argv[2]+"/"+argv[3]+".html","w")
html_code_list = html_code.readlines()
cpy=False
data = ""

if (len(argv)==5):
    argv=argv[4]
else:
    argv=argv[4]+" "+argv[5]

for line in html_code_list:
    line = line.strip()

    if "<em>"+argv+"</em>" in line:
        cpy = True
    if '<!-- ************************************************************************** -->' in line:
        cpy = False
    if cpy:
        data += line

new_html_code.write(data)
