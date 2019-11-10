CREATE TABLE IF NOT EXISTS types (
    `list_english` VARCHAR(8) CHARACTER SET utf8,
    `list_chinese` VARCHAR(2) CHARACTER SET utf8,
    `list_japanese` VARCHAR(5) CHARACTER SET utf8
);
INSERT INTO types VALUES
    ('Normal','一般','ノーマル'),
    ('Fighting','格斗','かくとう'),
    ('Flying','飞行','ひこう'),
    ('Poison','毒','どく'),
    ('Ground','地上','じめん'),
    ('Rock','岩石','いわ'),
    ('Bug','虫','むし'),
    ('Ghost','幽灵','ゴースト'),
    ('Steel','钢','はがね'),
    ('Fire','炎','ほのお'),
    ('Water','水','みず'),
    ('Grass','草','くさ'),
    ('Electric','电','でんき'),
    ('Psychic','超能','エスパー'),
    ('Ice','冰','こおり'),
    ('Dragon','龙','ドラゴン'),
    ('Dark','恶','あく'),
    ('Fairy','妖精','フェアリー');
