#!/home/anser/anaconda2/bin/python2.7

from sys import argv
import codecs




html_code = codecs.open(argv[1], 'r')
new_html_code = open(argv[2]+"/"+argv[3]+".html","w")
html_code_list = html_code.readlines()
cpy=False
data =""
data2=""
argv1=""


for i in range(len(argv[4:])):
	argv1+=argv[i+4]+" "

for line in html_code_list:
    line = line.strip()
    data2 += line
    if "<em>"+argv1[:-1]+"</em>" in line:
        cpy = True
    if '<!-- ************************************************************************** -->' in line:
        cpy = False
    if cpy:
        data += line

if data=="":
    new_html_code.write(data2)
else :
    new_html_code.write(data)
