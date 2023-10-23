# Page 404.php
    - RewriteEngine on
    - ErrorDocument 404 /pages/notfound.php

# Page  creation bien immobiliers
    - Select type de bien
    - Select multiple Option (Tom Select UX)
    - form enctype multipart
    - name[] pour les select multiple
# Gestion des images 
    - files names $_FILES['images']['name']
    - files tmp names $_FILES['images']['tmp_name']
    - loop throufh file names
        - uniqid . basename(filenames[i])
        - file path "storage/property/$filename"
        - push images db the file path
        - move_uploaded_files(tmp_names[i], "documanrRoot/public/filepath") SERVER
        - require db et models
        - last_id pdo->lastid

# Listing des bien
    - Fetch All with ZipCode and City Most recent
    - Filters (price,city, type) As an EXTRA
    - Pagination As an Extra

# Detail Des bien
    - JSON_OBJECT(p.*,   
        options  (
            SELECT (JSON_ARRAYAGG(o.name))
            FROM db.options o
            JOIN db.prop_options po2 on o.id = po2.option_id
            WHERE po2.id = p.id
        ) 
    ) as property
    FROM db.pro_opt po
    JOIN db.properties p on p.id = p.id = po.id
    Join db.pro_type pt on pt.id = p.property_type_id
    WHERE property_id = ?
        

