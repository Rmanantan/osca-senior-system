# Configuration Management Plan

## Repository management
- GitHub stores source code and version history.
- `main` contains the stable/final version.
- `development` contains active development.
- Feature branches are used for larger changes.

## Suggested versions
- v0.1.0 Initial system
- v0.2.0 Senior citizen records
- v0.3.0 Benefits
- v0.4.0 QR verification
- v0.5.0 Analytics
- v0.6.0 User roles
- v1.0.0 Final system

## Change flow
Request Change -> Review -> Develop -> Test -> Commit -> Merge to development -> Review -> Merge to main

## Security
Never commit `.env`, passwords, API keys, or real senior citizen personal information.
