/* gulpfile.js */

const uswds = require("@uswds/compile");

/**
 * USWDS version
 */

uswds.settings.version = 3;

/**
 * Path settings
 * Set as many as you need
 */

uswds.paths.src.uswds = "./node_modules/@uswds";
uswds.paths.src.sass = "./node_modules/@uswds/uswds/packages";
uswds.paths.src.js = "./node_modules/@uswds/uswds/dist/js";
uswds.paths.src.fonts = "./node_modules/@uswds/uswds/dist/fonts";
uswds.paths.dist.css = './css';
uswds.paths.dist.theme = './sass';
uswds.paths.dist.js = './js';
uswds.paths.dist.fonts = './fonts';

/**
 * Exports
 * Add as many as you need
 */

exports.compile = uswds.compile;
exports.watch = uswds.watch;
exports.init = uswds.init;
exports.update = uswds.updateUswds;
exports.default = uswds.watch;