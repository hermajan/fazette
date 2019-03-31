#! /bin/bash

python --version
pip --version

pip install mkdocs
mkdocs --version

pip install mkdocs-material
pip install pygments
pip install https://github.com/bmcorser/fontawesome-markdown/archive/master.zip --upgrade
pip install pymdown-extensions
