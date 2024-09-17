const Sequelize = require("sequelize");
sequelize = new Sequelize('exercicio-express','root','mysqluser',
{
    host:'localhost',
    dialect:'mysql'
})

module.exports = {
    Sequelize,
    sequelize
}