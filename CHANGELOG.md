# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Removed
- All auth is now handled by portal-auth

### Changed
- Fix js bug with loading old settings into the settings pane
- Confirmation before module instance is deleted
- Do not report NotInActivityInstanceException
- Remove serveStatic function
- Updated Dependencies
- Support SDK v5

### Added
- Assign Roles module
- Failed jobs table

## [1.2.1] - (18/03/2020)

### Added
- Updated Dependencies

## [1.2] - (16/03/2020)

### Changed
- Bump SDK version
- Use the request parameters to track the activity instance

### Added
- Bind default testing Authentication and ActivityInstance contracts in tests

## [1.1.2] - (12/03/2020)

### Added
- Enable scheduling of commands from modules

## [1.1.1] - (12/03/2020)

### Added
- Bind the module instance in when using a custom route

### Changed
- Update modules and dependencies

## [1.1] - (25/02/2020)

### Added
- Completion condition testing
- See all fired events within a module

### Changed
- Authentication now returns a group and role when needed by the activity
- Creating a module instance accepts an 'activity_for' type, user, group or role

## [1.0.3] - (12/02/2020)

### Changed
- Registration changes to match new SDK
- Set up User Provider
- Update dependencies

## [1.0.2] - (05/02/2020)

### Changed
- Updated Dependencies

## [1.0.1] - (17/01/2020)

### Changed
- Updated Dependencies

## [1.0] - (17/01/2020)

### Added
- Initial Release
- Open and save module instances
- Change settings, permissions and third party connections

[Unreleased]: https://github.com/bristol-su/playground/compare/v1.2.1...HEAD
[1.2.1]: https://github.com/bristol-su/playground/compare/v1.2...v1.2.1
[1.2]: https://github.com/bristol-su/playground/compare/v1.1.2...v1.2
[1.1.2]: https://github.com/bristol-su/playground/compare/v1.1.1...v1.1.2
[1.1.1]: https://github.com/bristol-su/playground/compare/v1.1...v1.1.1
[1.1]: https://github.com/bristol-su/playground/compare/v1.0.3...v1.1
[1.0.3]: https://github.com/bristol-su/playground/compare/v1.0.2...v1.0.3
[1.0.2]: https://github.com/bristol-su/playground/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/bristol-su/playground/compare/v1.0...v1.0.1
[1.0]: https://github.com/bristol-su/playground/releases/tag/v1.0
