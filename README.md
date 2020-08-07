- 部署简单

    把整个文件夹放到网站根目录即可

- 调用方法
``` html
<script type="text/javascript" src="//domain/hitokoto/?format=js&charset=utf-8&rows=1"></script>
<div id="hitokoto"><script>hitokoto()</script></div>
```
- 参数

|参数名|含义|
|---|---|
|format|输出类型,为空则仅输出文本|
|charset|输出的编码格式|
|rows|文本的行数,默认为单行|
