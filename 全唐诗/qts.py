import requests
from bs4 import BeautifulSoup
import re

# 杜甫在195-224页
# 其他章节分布如下：
# https://zh.m.wikisource.org/zh/全唐詩

page = 195
while page <= 224:
    url = "http://122.200.75.13/诗藏/诗集/全唐诗-" + str(page) + ".html"
    page = page + 1
    r = requests.get(url)
    html = r.content

    html_doc = str(html, 'utf-8')  # html_doc=html.decode("utf-8","ignore")

    bf = BeautifulSoup(html_doc, 'lxml')

    # //div[@class='panel-body']//span
    texts = bf.find_all('span')

    ts = re.sub(r'</span>', "", texts[0].decode())
    ts = re.sub(r'<br/>', "", ts)

    with open("list.txt", "a+", encoding="utf-8") as f:
        f.write(ts)
