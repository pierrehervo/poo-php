--Creer Iron Man et Batman
--Créer Joker et Thanos
--Associations: le Joker et l'ennemi de Batman
--              Thonos est l'ennemi de Batman et Iron Man

-- Ecrire la requête qui permet de retrouver le ou les ennemis de Batman
--Ecrire la requête qui permet de retrouver le ou les ennemis de Thanos

-- Ecrire la requête qui permet de retrouver le ou les ennemis de Batman

SELECT * FROM superheroe sh
INNER JOIN superheroe_has_supernaughty shs ON shs.superheroe_id = sh.id
INNER JOIN supernaughty sn ON shs.supernaughty_id = sn.id
WHERE sh.name = 'Batman'

-- Ecrire la requête qui permet de retrouver le ou les ennemis de Thanos

SELECT * FROM supernaughty sn
INNER JOIN superheroe_has_supernaughty shs ON shs.supernaughty_id = sn.id
INNER JOIN superheroe sh ON shs.superheroe_id = sh.id
WHERE sn.name = 'Thanos'

-- Récupèrer tous les héros (même ceux qui n'ont pas d'ennemis)
SELECT * FROM superheroe sh
LEFT JOIN superheroe_has_supernaughty shs ON shs.superheroe_id = sh.id
LEFT JOIN supernaughty sn ON shs.supernaughty_id = sn.id